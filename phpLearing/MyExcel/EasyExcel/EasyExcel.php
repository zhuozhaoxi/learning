<?php
/** Include PHPExcel */
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
class EasyExcel
{
	private function getAlphNum($char){
		$array=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$len=strlen($char);
		$sum = 0;
		for($i=0;$i<$len;$i++){
			$index=array_search($char[$i],$array);
			$sum+=($index+1)*pow(26,$len-$i-1);
		}
		return $sum;
	}
	private function getChars($num){
		$array=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$res = '';
		while ($num) {
			$tmp = $num % 26;
			if ($tmp == 0) {
				$res = $array[25].$res;
				$num = floor($num / 26) - 1;
			}else{
				$res = $array[$tmp - 1].$res;
				$num = floor($num / 26);
			}
		}
		return $res;
	}

	private function createPHPExcelObj($header,$dataList)
	{
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("钊熙")					// 创建者
								 ->setLastModifiedBy("Maarten Balliauw")	// 最后一次保存者
								 ->setTitle("PHPExcel Test Document")		// 标题
								 ->setSubject("PHPExcel Test Document主题？")		// 主题
								 ->setDescription("Test document for PHPExcel, generated using PHP classes.") // 备注
								 ->setKeywords("office PHPExcel php")		// 标记
								 ->setCategory("Test result file");			// 类别

		// 增加头部
		// Add some data
		$objPHPExcel->setActiveSheetIndex(0);
		$i = 1;
		foreach ($header as $key => $value) {
			$char = $this->getChars($i++);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue($char.'1',$value);
		}

		$j = 1;
		if (empty($header)) {
			$j = 0;
		}
		// 增加数据
		foreach ($dataList as $row) {
			$j++;
			$i = 1;
			foreach ($row as $key => $value) {
				$char = $this->getChars($i++);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue($char.$j,$value);
			}
		}
		$objPHPExcel->getActiveSheet()->setTitle('Simple');
		return $objPHPExcel;
	}

	public function saveExcel($header,$dataList,$name,$type = 'xls'){
		$objPHPExcel = $this->createPHPExcelObj($header,$dataList);
		// Save Excel 2007 file
		if ($type == 'xlsx') {
				$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
				$objWriter->save($name.'.xlsx');
		}else{
				$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
				$objWriter->save($name.'.xls');
		}
	}

	public function downLoadExcel($header,$dataList,$name,$type = 'xls'){
		if (PHP_SAPI == 'cli'){
			die('This example should only be run from a Web Browser');
		}
		$objPHPExcel = $this->createPHPExcelObj($header,$dataList);
		$filename = $type == 'xlsx' ? $name.'.xlsx' : $name.'.xls';
		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $type == 'xlsx' ? 'Excel2007' : 'Excel5');
		$objWriter->save('php://output');
	}
}