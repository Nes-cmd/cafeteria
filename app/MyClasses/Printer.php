<?php
namespace App\MyClasses;

use charlieuki\ReceiptPrinter\ReceiptPrinter as ReceiptPrinter;
use Exception;
use App\User;
class Printer
{
	
	public function printReceit( $user, $items)
	{
		$mid = '123123456';
		$store_name = $user->org;
		$store_address = $user->work_place;
		$store_phone = $user->telephone;
		$store_email = $user->email;
		$store_website = 'warkaorder.com';
		$tax_percentage = 15;
		$transaction_id = 'TX123ABC456';
        try{
			$userPrinter = $user->printers()->where('purpose', 'real_receit')->where('status', 1)->first();
			if($userPrinter == null){
				throw new Exception('You hasn\'t set up printer for real_receit action or it is not active');
				}
			$operator = $userPrinter->operator;
			$name = $userPrinter->name;
			
			$printer = new ReceiptPrinter;
			$printer->init($operator, $name);

			// Set store info
			$printer->setStore($mid, $store_name, $store_address, $store_phone, $store_email, $store_website);
			// Add items
			foreach ($items as $item) {
				// throw new Exception($item['name']);
				$printer->addItem(
					$item['name'],
					$item['quant'],
					$item['price']
				);
			}
			// Set tax
			$printer->setTax($tax_percentage);

			// Calculate total
			$printer->calculateSubTotal();
			$printer->calculateGrandTotal();

			// Set transaction ID
			$printer->setTransactionID($transaction_id);

			// Set qr code
			$printer->setQRcode([
				'tid' => $transaction_id,
			]); 
			// Print receipt
			$printer->printReceipt();
			return 1;
		}
		catch(Exception $e){
			return($e->getMessage());
		}
    	return 1;
	}
	public function printBono($cafe_id, $items, $order_adress)
	{
		$userPrinter = \App\MyModel\Printer::where('user_id', $cafe_id)->where('purpose', 'notify_orders')->where('status', 1)->first();
		if ($userPrinter != null) {
            $user = User::where('id', $cafe_id)->first();
			$mid = '123123456';
			$store_name = $user->org;
			$store_address = $user->work_place;
			$store_phone = $user->telephone;
			$store_email = $user->email;
			$store_website = 'warkaorder.com';
			//$tax_percentage = 12;
			$transaction_id = 567;
			
		
			// Init printer
			try{
			$printer = new ReceiptPrinter;
			$printer->init($userPrinter->operator, $userPrinter->name);

			// Set store info
			$printer->setStore($mid, $store_name, $store_address, $store_phone, $store_email, $store_website);
			
			$printer->setOrderAdress($order_adress);

			// Add items
			foreach ($items as $item) {
				$printer->addItem(
					$item['item'],
					$item['quantity'],
					$item['price'] 
				);
			}
			// Set tax

			// Calculate total
			$printer->calculateSubTotal();
			//$printer->calculateGrandTotal();
			$printer->printBono();
			}
			catch(Exception $e){
				return($e->getMessage());
			}
		}
    	return 'No printer';
	}
}
?>