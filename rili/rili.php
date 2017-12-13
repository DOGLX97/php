<?php
    class Rili{
        // public $year;
        // public $month;
        // public $days;//一个月有多少天
        // public $dayweeks;//每个月1号是星期几 
        //初始化数据
        public function __construct(){
            $this->year =$_GET['year']? $_GET['year']:date("Y");
            $this->month=$_GET['month']? $_GET['month']:date("m");
            $this->days=date('t',mktime(0,0,0,$this->month,1,$this->year));
            $this->dayweeks=date('w',mktime(0,0,0,$this->month,1,$this->year));
        }
        //画表格 画改变年月 画周 画日
        public function out(){
            echo "<table align='center' border='2' width='300'>";
            $this->changeDay();
            $this->weekList();
            $this->daysList();
            echo "</table>";
        }
        //上一年
        public function prevYear($year,$month){
            if($year==1970){
                $year=1970;
            }else{
                $year=$year-1;
            }
            return "year=$year&month=$month";
        }
        //下一年
        public function nextYear($year,$month){
            if($year==2038){
                $year=2038;
            }else{
                $year=$year+1;
            }
            return "year=$year&month=$month";
        }
        //上个月
        public function prevMonth($year,$month){
            if($month==1){
                $month=12;
            }else{
                $month=$month-1;
            }
            return "year=$year&month=$month";
        }
        //下个月
        public function nextMonth($year,$month){
            if($month==12){
                $month=1;
            }else{
                $month=$month+1;
            }
            return "year=$year&month=$month";
        }
        //画改变年月
        public function changeDay(){
            echo "<tr>";
            echo "<td><a href='?".$this->prevYear($this->year,$this->month)."'><<</a></td>";
            echo "<td><a href='?".$this->prevMonth($this->year,$this->month)."'><</a></td>";
            echo "<td colspan='3'>".$this->year."年".$this->month."月"."</td>";
            echo "<td><a href='?".$this->nextMonth($this->year,$this->month)."'>></a></td>";
            echo "<td><a href='?".$this->nextYear($this->year,$this->month)."'>>></a></td>";            
            echo "</tr>";
        }
        //画周
        public function weekList(){
            $arr=array('日','一','二','三','四','五','六');
            echo "<tr>";
            for($i=0;$i<count($arr);$i++){
                echo "<td class='bgblue'>".$arr[$i]."</td>";
            }
            echo "</tr>";
        }
        //画日
        public function daysList(){
            echo "<tr>";
            for($j=0;$j< $this->dayweeks ;$j++){
                echo "<td>"."&nbsp;"."</td>";
            }
            for($k=1;$k<= $this->days;$k++){
                $j++;
                if($k==date('d')){
                    echo "<td class='bgblue'>".$k."</td>";
                }else{
                    echo "<td>$k</td>";
                }
                if($j % 7==0){
                    echo "</tr><tr>";
                }
            }
            echo "</tr>";
        }
    }
    $r=new Rili();
    $r->out();
?>
<style>
.bgblue{
    background:blue;
    color:white;
}
</style>