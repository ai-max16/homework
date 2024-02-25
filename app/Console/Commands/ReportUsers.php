<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class ReportUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:users {--last30days}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'アプリケーションに登録されているユーザーの数を報告し、オプションで過去30日間に登録されたユーザーの数を表示する';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $totalUsers = User::count();
        $message = "登録されているユーザーの数: $totalUsers";

        if ($this->option('last30days')) {
            $startDate = Carbon::now()->subDay(30);
            $newUsersLast30Days = User::where('created_at', '>=', $startDate)->count();
            $message .= "\n過去30日間に登録された人数: $newUsersLast30Days";
        }

        // メール送信
        /*
        Mail::raw($message, function ($mail) {
            $mail->to('renn8q8@gmail.com')
                ->subject('ユーザーレポート');
        }); 
        */

        // $this->info('レポートをメールで送信しました。');

        \Log::info('バッチ処理によりログを出力しました。');

        return Command::SUCCESS;
    }
}
