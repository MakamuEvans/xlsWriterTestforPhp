<?php
/**
 * Created by PhpStorm.
 * User: elm
 * Date: 2019-09-12
 * Time: 21:58
 */
$config   = ['path' => './'];
$excel = new \Vtiful\Kernel\Excel($config);
//$filePath = $excel->fileName('test.xlsx')
   // ->header(['Phone'])
    //->output();
//print_r($filePath);

$data = $excel->openFile('./tests/Laundry.xlsx')
    ->openSheet();

while ($dt = $data->nextRow()) {
    var_dump($dt);
}

die();

$conn = mysqli_connect('127.0.0.1', 'root', '', 'bluesky');

if (!$conn) {
    $this->logError("Connection error: " . mysqli_connect_error());
    exit();
}
foreach ($data as $item){
    print_r($item[0]);
    $update_query = "INSERT INTO `items` (`name`, `description`, `price`, `status`, `created_by`, `deleted_at`, `created_at`, `updated_at`)
VALUES
	('$item[0]', NULL, '$item[2]', 1, 1, NULL, '2019-07-16 16:13:52', '2019-07-16 16:13:52');
";
    $update = mysqli_query($conn, $update_query);
    if (!$update) {
        print_r(mysqli_error($conn));
        die();
    }
}
