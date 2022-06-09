<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Blog;
use Illuminate\Console\Command;

class DeleteBlogsOlderThan30Days extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:blogs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete blogs older than 30 days';

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
        $blogs = Blog::where('created_at', '<=', Carbon::now()->subDays(30)->toDateTimeString())->get();

        foreach($blogs as $blog){
            $blog->delete();
        }
    }
}
