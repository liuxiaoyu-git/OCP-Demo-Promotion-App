 <?php
 header('Content-type: text/html; charset=utf-8');
    $online_log='count.txt';//保存在线人数数据的文件,
        if (!file_exists($online_log)) {
            mkdir($online_log, '0777');//linux下，某些文件缺少操作权限我们需要赋予操作权限
            }
    $entries=file('\\'.$online_log);//将文件作为一个数组返回，数组中的每个单元都是文件中相应的一行，包括换行符在内
    $temp=array();
    for($i=0;$i<count($entries);$i++){
        $entry=explode(',',trim($entries[$i]));
        if(count($entry)>1){
            if(($entry[0]!=getenv('REMOTE_ADDR'))&&($entry[1]>time())){
                array_push($temp,$entry[0].','.$entry[1]."\n");//取出其他浏览者的信息,并去掉超时者,保存进$temp
            }
        }
    }
    array_push($temp,getenv('REMOTE_ADDR').','.(strtotime("+10second"))."\n");//更新浏览者的时间
    $users_online=count($temp);//计算在线人数
    $entries=implode('',$temp);
    //写入文件
    $fp=fopen('\\'.$online_log,'w');
    flock($fp,LOCK_EX);//注意 flock() 不能在NFS以及其他的一些网络文件系统中正常工作
    fputs($fp,$entries);
    flock($fp,LOCK_UN);
    fclose($fp);
    echo '当前有'.$users_online.'人在线';
 ?>
