<?php 

namespace App\Libraries;

class Common {

	static function pr($array=array()) {
		echo "<pre>";
		print_r($array);
		echo "</pre>";
	}

	static function appendParamToUrl($url, $input) {
		foreach ($input as $key => $value) {
			$query = parse_url($url, PHP_URL_QUERY);
			// Returns a string if the URL has parameters or NULL if not
			if ($query) {
				$url .= '&'.$key.'='.$value;
			} else {
				$url .= '?'.$key.'='.$value;
			}
		}
		return $url;
	}

	static function curPageURL() {
		$pageURL = 'http';
		if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
			$pageURL .= "s";
		}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		return $pageURL;
	}

	static function appendParamToUrlNew($appendArr, $url) {
		$url_parts = parse_url($url);
		parse_str(parse_url( $url, PHP_URL_QUERY), $get_array);
		$base_url = $url_parts['scheme'] . '://' . $url_parts['host'] . $url_parts['path'];

		$url =  $base_url."?".http_build_query(array_merge($get_array, $appendArr));
		return $url;
	}

	static function truncateToLength($phrase, $max_words=20) {
		$phrase_array = explode(' ',$phrase);
		if(count($phrase_array) > $max_words && $max_words > 0)
			$phrase = implode(' ',array_slice($phrase_array, 0, $max_words)).'...';
		return $phrase;
	}

	static function validateCurlResponse($response) {
		if($response[0] !== 200) {
			return view('errors.SWW');
		} else 
		return $response[1];
	}

	static function getPagination($pageNum = 0, $resultArr = array()) {
		//Self::pr($resultArr);
		$limit = config('config.PAGINATION_LIMIT');
		$currFirst = (isset($resultArr[0]) && !empty($resultArr[0]->counter))?$resultArr[0]->counter:0;
		$totalResults = $currFirst + $limit * ($pageNum);
		$totalPages = ceil($totalResults / $limit);
		return array('currFirst' => $currFirst, 'totalResults' => $totalResults, 'totalPages' => $totalPages, 'currPage' => ($pageNum + 1));
	}

	static function getPaginationUI($paginationData) {
		$returnStr = '';

		if($paginationData['totalPages'] > 1) {
			$url = $paginationData['url'];
			$returnStr .= '<div class="pagination_class"><ul class = "pagination pagination-lg">';
			for($i = 0; $i < $paginationData['totalPages']; $i++) { 
				$class = '';
				if($paginationData['currPage']-1 == $i) {
					$class = 'class="active"';
				}
				$appendArr = array('page' => $i);
				$returnStr .= '<li '.$class.'><a href="'.Self::appendParamToUrlNew($appendArr, $url).'">'.($i+1).'</a></li>';
			}
			$returnStr .= '</ul></div>';
		}
		return $returnStr;
	}

	static function timeAgo() {
		$SECOND = 1;
		$MINUTE = 60 * $SECOND;
		$HOUR = 60 * $MINUTE;
		$DAY = 24 * $HOUR;
		$MONTH = 30 * $DAY;

		$ts = time() - strtotime($yourDate);
		//$delta = Math.Abs(ts.TotalSeconds);

		/*if (delta < 1 * $MINUTE) {
			return ts == 1 ? "one second ago" : ts + " seconds ago";
		} if (delta < 2 * $MINUTE) {
			return "a minute ago";
		} if (delta < 45 * $MINUTE) {
			return ts + " minutes ago";
		} if (delta < 90 * $MINUTE) {
			return "an hour ago";
		} if (delta < 24 * $HOUR) {
			return ts + " hours ago";
		} if (delta < 48 * $HOUR) {
			return "yesterday";
		} if (delta < 30 * $DAY) {
			return ts + " days ago";
		} if (delta < 12 * MONTH) {
			int months = Convert.ToInt32(Math.Floor((double)ts.Days / 30));
			return months <= 1 ? "one month ago" : months + " months ago";
		} else {
			int years = Convert.ToInt32(Math.Floor((double)ts.Days / 365));
			return years <= 1 ? "one year ago" : years + " years ago";
		}*/
	}
}