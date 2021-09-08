<?php

namespace App\Console\Commands;

use App\Services\CrawlerService;
use Illuminate\Console\Command;

class ParsingConstellation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parsing:constellation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parsing constellation from website and store to database.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $crawService = new CrawlerService();
        for ($i=0; $i < 11; $i++) {
            $crawService->getNode("https://astro.click108.com.tw/daily_11.php?iAstro=" . $i);
        }
    }
}
