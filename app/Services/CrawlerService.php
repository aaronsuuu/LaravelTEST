<?php
    namespace App\Services;

    use GuzzleHttp\Client;
    use Symfony\Component\DomCrawler\Crawler;
    use App\Models\Constellation;

    class CrawlerService{
        private $client;

        public function __construct(){
            $this->client = app(Client::class);
        }

        public function getDomData(string $url) : Crawler{
            // $content = $this->client->get($url)->getBody()->getContents();
            $content = $this->client->get($url)->getBody()->getContents();
            $crawler = new Crawler();
            $crawler->addHtmlContent($content);

            return $crawler;
        }

        public function getNode(string $url){
            $content = $this->client->get($url)->getBody()->getContents();
            $crawler = new Crawler();
            $crawler->addHtmlContent($content);

            // $target = $crawler->filterXPath('//div[@class="TODAY_CONTENT"]')->filter('h3')->text();
            $constellation = mb_substr($crawler->filterXPath('//div[@class="TODAY_CONTENT"]')->filter('h3')->text(), 2, 3, "UTF-8");
            $today = $crawler->filterXPath('//div[@class="TODAY_CONTENT"]')->filter('p')->eq(1)->text();
            $love = $crawler->filterXPath('//div[@class="TODAY_CONTENT"]')->filter('p')->eq(3)->text();
            $business = $crawler->filterXPath('//div[@class="TODAY_CONTENT"]')->filter('p')->eq(5)->text();
            $lucky = $crawler->filterXPath('//div[@class="TODAY_CONTENT"]')->filter('p')->eq(7)->text();

            $constell = new Constellation();
            $constell->name = $constellation;
            $constell->luck_date = date('Y-m-d');
            $constell->today_luck = $today;
            $constell->love_luck = $love;
            $constell->business_luck = $business;
            $constell->money_luck = $lucky;
            $constell->save();

            $array = array(
                "今日日期" => date("Y-m-d"),
                "星座名稱" => $constellation,
                "今日運勢" => $today,
                "愛情運勢" => $love,
                "事業運勢" => $business,
                "財運運勢" => $lucky
            );
            return $array;
        }

        public function getRawData(string $url){
            $content = $this->client->get($url)->getBody()->getContents();
            return $content;
        }
    }
?>
