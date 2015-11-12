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