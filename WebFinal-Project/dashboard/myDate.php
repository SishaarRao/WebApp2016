<?php
   class myDate {
      var $month;
      var $day;
      function set_month($new_month) {$this->month = $new_month;}
      function get_month() {return $this->month;}
      function set_day($new_day) {$this->day = $new_day;}
      function get_day() {return $this->day;}
      function toString(){return $this->month . $this->day;}
   }
?>
