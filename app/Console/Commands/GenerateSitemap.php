<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Carbon\Carbon;
use App\Models\Oppty;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    protected $description = 'Generate the sitemap.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sitemap = Sitemap::create();

        // Add static pages
        // $sitemap->add(Url::create('/')
        //     ->setLastModificationDate(Carbon::now())
        //     ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
        //     ->setPriority(1.0));

        $sitemap->add(Url::create('/about')
        ->setLastModificationDate(Carbon::now())
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        ->setPriority(0.8));

        $sitemap->add(Url::create('/terms')
        ->setLastModificationDate(Carbon::now())
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        ->setPriority(0.8));

        $sitemap->add(Url::create('/advertise')
        ->setLastModificationDate(Carbon::now())
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        ->setPriority(0.8));

        $sitemap->add(Url::create('/privacy')
        ->setLastModificationDate(Carbon::now())
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        ->setPriority(0.8));

        $currentdate = Carbon::now();

        // Add dynamic pages (e.g., blog posts)
        $posts = Oppty::where('deadline', '>=', $currentdate)->get();
        foreach ($posts as $post) {
            $sitemap->add(Url::create("/opp/{$post->id}/{$post->slug}")
                ->setLastModificationDate($post->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(1.0));
        }
        
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap has been generated!');
    }
}
