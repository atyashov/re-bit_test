<?php

namespace App\Console\Commands;

use App\Models\Manager;
use Illuminate\Console\Command;

class CreateManager extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:manager {login : Логин менеджера}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Создание нового менеджера';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $model = new Manager();
        $login = $this->argument('login');
        $password = str()->password(16);

        if ($model->where('login', $login)->first()) {
            echo "Менеджер с логином $login уже существует \r\n";
            return 1;
        }

        $model->fill([
            'login' => $login,
            'password' => $password
        ]);

        if ($model->save()) {
            echo "Менеджер $login с паролем $password создан \r\n";
            return 0;
        }
        echo "Не удалось создать менеджера \r\n";
        return 1;
    }
}
