<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Mail;
use App\User;

class CustomCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'custom:command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email all inactive users';

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
     * @return mixed
     */
    public function handle()
    {
        //
        
        $user = User::all();
        foreach ($user as $d) {
            # code...
            $data = array(
                        'nama' => $d->name,
                        'tanggal' => $d->created_at,
                        'keterangan' => 'Bagi peserta yang mendaftar dengan Rumpun Ilmu Tertentu, pastikan anda belum pernah mendaftar atau mengikuti penelitian hibah sebelumnya, Apabila anda sudah pernah mendaftar dan mengikuti hibah sebanyak 2x, maka anda tidak dapat mendaftar atau mengikuti hibah pada Program Studi Berikutnya di seluruh Indonesia'
                    );

            // Mail::send('emails.welcome', $data, function ($message)use($d) {
            //     $message->from('pendaftaranunud@gmail.com', 'STMDOS LPPM STIKI Indonesia');
            //     $message->to($d->email)->subject('SIMDOS LPPM STIKI Indonesia');
            // });
            // $this->info('All inactive users are sent mail successfully!');
        }

        // DB::table('users')->where('active', 0)->delete();
        // $this->info('All inactive users are sent mail successfully!');
    }
}
