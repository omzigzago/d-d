
	function getPager($pages_total,$page,$mode=0,$lines=10,$page_inks=10)
	{
		$all_page_links=array();
		if($pages_total<=0 or !is_numeric($pages_total) or !is_numeric($lines) or !is_numeric($page_inks) or !is_numeric($page) )
		{
			return $all_page_links;
		}
		$page_max=($pages_total % $lines==0)?intval($pages_total/$lines):(intval($pages_total/$lines)+1);
		$page=($page<1)?1:$page;
		$page=($page>$page_max)?$page_max:$page;
		$pages=($page % $page_inks==0)?intval($page/$page_inks-1):intval($page/$page_inks);
		$all_page_links["first_page"]=1;
		$page_links_start=($mode==ROLL_BY_PAGE)?$page:($pages*$page_inks+1);
		$page_links_end=($mode==ROLL_BY_PAGE)?($page+$page_inks):(($pages+1)*$page_inks+1);
		$page_first_link=($mode==ROLL_BY_PAGE)?1:$page_inks;
		if($page>$page_first_link)
		{
			$all_page_links["prev_page"]=($mode==ROLL_BY_PAGE)?(intval(($page/$page_inks)-1)*$page_inks+1):($page_links_start-1);
		}
		$all_page_links["first_page_link"]=$page_links_start;
		for($p=$page_links_start;($p<$page_links_end and $p<=$page_max);$p++)
		{
			if($p==$page)
			{
				$all_page_links["current_page"]=$p;
			}
		}
		$all_page_links["last_page_link"]=$p-1;
		if($p<=$page_max)
		{
			$all_page_links["next_page"]=($mode==ROLL_BY_PAGE or ($page % $page_inks==0))?($page+1):(intval(($page/$page_inks)+1)*$page_inks+1);
		}
		$all_page_links["last_page"]=$page_max;
		return $all_page_links;
	}
	
	
	function pagination($pages_total,$page,$mode=0,$lines=10,$page_inks=10)
	{
		$all_page_links=array();
		if($pages_total<=0 or !is_numeric($pages_total) or !is_numeric($lines) or !is_numeric($page_inks) or !is_numeric($page) )
		{
			return $all_page_links;
		}
		$page_max=($pages_total % $lines==0)?intval($pages_total/$lines):(intval($pages_total/$lines)+1);
		$page=($page<1)?1:$page;
		$page=($page>$page_max)?$page_max:$page;
		$pages=($page % $page_inks==0)?intval($page/$page_inks-1):intval($page/$page_inks);
		$all_page_links["first_page"]=1;
		$page_links_start=($mode==ROLL_BY_PAGE)?$page:($pages*$page_inks+1);
		$page_links_end=($mode==ROLL_BY_PAGE)?($page+$page_inks):(($pages+1)*$page_inks+1);
		$page_first_link=($mode==ROLL_BY_PAGE)?1:$page_inks;
		if($page>$page_first_link)
		{
			$all_page_links["prev_page"]=($mode==ROLL_BY_PAGE)?(intval(($page/$page_inks)-1)*$page_inks+1):($page_links_start-1);
		}
		$all_page_links["first_page_link"]=$page_links_start;
		for($p=$page_links_start;($p<$page_links_end and $p<=$page_max);$p++)
		{
			if($p==$page)
			{
				$all_page_links["current_page"]=$p;
			}
		}
		$all_page_links["last_page_link"]=$p-1;
		if($p<=$page_max)
		{
			$all_page_links["next_page"]=($mode==ROLL_BY_PAGE or ($page % $page_inks==0))?($page+1):(intval(($page/$page_inks)+1)*$page_inks+1);
		}
		$all_page_links["last_page"]=$page_max;
		return $all_page_links;
	}
