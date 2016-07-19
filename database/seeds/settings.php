<?php

use Illuminate\Database\Seeder;

class settings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('setting')->insert([
            'field' => 'wpUser',
            'value' => 'prappo'
        ]);

        DB::table('setting')->insert([
            'field' => 'wpPassword',
            'value' => 'bangladesh'
        ]);

        DB::table('setting')->insert([
            'field' => 'wpUrl',
            'value' => 'https://wp-prappo.rhcloud.com'
        ]);

        DB::table('setting')->insert([
            'field' => 'tuConKey',
            'value' => 't83HiqxUTzfez1oVgYJOIXW0k0s7K0kNkDmJaHCYrT2Dq3PN3k'
        ]);

        DB::table('setting')->insert([
            'field' => 'tuConSec',
            'value' => 'XckHQ3vdRjtKY8oLx8EljZQCI4EwlFAFVwqLVI6RNn0jgBn6WY'
        ]);

        DB::table('setting')->insert([
            'field' => 'tuToken',
            'value' => 'j0jEoS17Xhcmn7EJorz4HvfPkzNVdWqX4fEcAke9SrzL1cGCRw'
        ]);

        DB::table('setting')->insert([
            'field' => 'tuTokenSec',
            'value' => 'aptTA2z7dlvAy9scUYkNvpLS1AGUhX80SQl8sExDvQf0ZMellf'
        ]);

        DB::table('setting')->insert([
            'field' => 'twConKey',
            'value' => 'yMCvz88elYMaExlEBzlbpsNsi'
        ]);

        DB::table('setting')->insert([
            'field' => 'twConSec',
            'value' => '6VtZOpy69Sj5puFXUmkTmVCrohJeQVxQ0VcUHObRE7i1LUiCKU'
        ]);

        DB::table('setting')->insert([
            'field' => 'twToken',
            'value' => '3244491199-5H1Js9CWPh60FDouP6wYBkZFPwwCRcTnY14MHfb'
        ]);

        DB::table('setting')->insert([
            'field' => 'twTokenSec',
            'value' => 'Bhn99JsTF9BPwHQFivv42V9xBeyma8QCKHAsC4KycDr9v'
        ]);

        DB::table('setting')->insert([
            'field' => 'fbAppId',
            'value' => '1005206272855960'
        ]);

        DB::table('setting')->insert([
            'field' => 'fbAppToken',
            'value' => ''
        ]);

        DB::table('setting')->insert([
            'field' => 'fbAppSec',
            'value' => 'ad651cba4249b9d6849a571bd1cf66f1'
        ]);

        DB::table('setting')->insert([
            'field' => 'tuDefBlog',
            'value' => 'prappo'
        ]);

        DB::table('setting')->insert([
            'field' => 'twUser',
            'value' => 'prappo_p'
        ]);

        DB::table('setting')->insert([
            'field' => 'fbDefPage',
            'value' => '273763529635798'
        ]);
    }
}
