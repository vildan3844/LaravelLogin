<?php

namespace App\Console\Commands;


use App\Console\Helpers;
use Illuminate\Console\Command;
use Hash;
use Illuminate\Support\Facades\Config;

class UserList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $userModel;
    protected $signature = 'send:message';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'User List';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->userModel = Config::get('auth.providers.users.model', \App\User::class);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $headers = ['id', 'name', 'email'];
        if(Helpers::isBouncerInstalled())
        {
            array_push($headers, 'roles');
        }
        $users = $this->userModel::all();
        $table = $users->map(function ($item, $key) {
            $data = [$item->id, $item->name, $item->email];
            if(Helpers::isBouncerInstalled())
            {
                array_push($data, $item->roles->implode('name', ','));
            }
            return $data;
        });
        $this->table($headers, $table);
    }

}
