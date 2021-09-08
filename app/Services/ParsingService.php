<?php
    namespace App\Services;

    use App\Services\CrawlerService;
    use Tests\TestCase;

    class ParsingService extends TestCase{
        private $crawlerService;

        public function Up(){
            parent::setUp();
            $this->crawlerService = app(CrawlerService::class);
        }

        public function Down(){
            parent::tearDown();
        }
    }
?>
