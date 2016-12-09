<?php

namespace test\Connection;

use \Illuminate\Support\Facades\Config;
use \Illuminate\Support\Facades\DB;
class Connection
{
	public function changeConnection($databaseName)
	{
		//If you want to use query builder without having to specify the connection
		Config::set('database.connections.mysql.database', $databaseName);
		Config::set('database.default', 'mysql');
		DB::reconnect('mysql');

	}
}
