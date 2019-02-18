<?php
$sql = "CREATE TABLE IF NOT EXISTS roomdetail (
  id int(11)  NOT NULL AUTO_INCREMENT,
  username varchar(50) NOT NULL,
  checkin_date date NOT NULL,
  checkout_date date NOT NULL,
  room_type varchar(50) NOT NULL,
  no_of_room varchar(50) NOT NULL,
  amount varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ";

?>