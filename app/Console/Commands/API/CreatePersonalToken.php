<?php

namespace App\Console\Commands\API;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Laravel\Passport\Passport;
use Laravel\Passport\PersonalAccessTokenResult;

class CreatePersonalToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:create-token 
                                {email : The email of the user}
                            ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create personal access token';

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

        $userEmail = $this->argument('email');

        /** @var User $user */
        $user = User::where('email', $userEmail)
            ->first();

        if (!$user) {
            $this->error('User not found');
            exit();
        }

        Passport::personalAccessTokensExpireIn(Carbon::now()->addHour());

        /** @var PersonalAccessTokenResult $token */
        $token = $user->createToken('console_created_token');

        $this->info($token->accessToken);
    }
}
