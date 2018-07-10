<?php
function convert_date_time($created_at){
$data_time_now=date('Y-m-d H:i:s');
                        $current_time=new DateTime($data_time_now);
                        $start_time=$created_at;
                        $interval=$start_time->diff($current_time);
                        if($interval->y>=1){
                            if($interval==1){
                                $time_message=$interval->y. " năm trước ";
                            }else{
                                $time_message=$interval->y. " năm trước ";
                            }
                        }else if($interval->m>=1){
                            if($interval->d==0){
                                $day=" ngày trước";
                            }else if($interval->d==1){
                                $day=$interval->d." ngày trước";
                            }
                            else{
                                $day=$interval->d." ngày trước";
                            }

                            if($interval->m==1){
                                $time_message=$interval->m." tháng ".$day;
                            }else{
                                $time_message=$interval->m." tháng ".$day;
                            }
                        }else if($interval->d>=1 ){
                            if($interval->d==1){
                                $time_message="Hôm qua";
                            }
                            else{
                                $time_message=$interval->d." ngày trước";
                                }
                        }else if($interval->h>=1){
                            if($interval->h==1){
                                $time_message=$interval->h." giờ trước";
                            }
                            else{
                                $time_message=$interval->h." giờ trước";
                            }
                        }else if($interval->i>=1){
                            if($interval->i==1){
                                $time_message=$interval->i." phút trước";
                            }
                            else{
                                $time_message=$interval->i." phút trước";
                                }
                        }else{
                                if($interval->s<30){
                                    $time_message=" Vừa xong";
                                }
                                else{
                                    $time_message=$interval->s." giây trước";
                                    }
                        }

                    return $time_message;
}
?>
