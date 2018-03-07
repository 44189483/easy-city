<?php
namespace Admin\Common\Controller;
use Think\Controller;
class PublicController extends Controller{

    public function getAmountData() {

    	$consumption = M('consumption');

		//当日 消费记录
		$nstart = date('Y-m-d').' 00:00:00';
		$nend = date('Y-m-d').' 23:59:59';
		$today_amount = $consumption->where("consTime BETWEEN '{$nstart}' AND '{$nend}'")->sum('amount');
		$data['today_amount'] = $today_amount == '' ? 0 : $today_amount;

		//当月 消费记录
		$mstart = date('Y-m-01', strtotime(date('Y-m-d')));  
		$mend = date('Y-m-d', strtotime("$mstart +1 month -1 day"));
		$month_amount = $consumption->where("consTime BETWEEN '{$mstart}' AND '{$mend}'")->sum('amount');
		$data['month_amount'] = $month_amount == '' ? 0 : $month_amount;

        return $data;
    }
}