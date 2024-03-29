<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('set_flashmessage'))
{
	function set_flashmessage($type, $message='Message from flash session data.')
	{
		$CI =& get_instance();
		$type = in_array($type, array(
			'primary', 'secondary', 'success', 'info', 'warning', 'danger', 'light', 'dark'
		)) ? $type : 'primary';

		return $CI->session->set_flashdata('message', array($type => $message));
	}
}

if ( ! function_exists('dump_debug'))
{
	function dump_debug($input, $collapse=false)
	{
		$recursive = function($data, $level=0) use (&$recursive, $collapse)
		{
			global $argv;

			$isTerminal = isset($argv);

			if ( ! $isTerminal && $level == 0 && !defined("DUMP_DEBUG_SCRIPT"))
			{
				define("DUMP_DEBUG_SCRIPT", true);

				echo '<script language="Javascript">function toggleDisplay(id) {';
				echo 'var state = document.getElementById("container"+id).style.display;';
				echo 'document.getElementById("container"+id).style.display = state == "inline" ? "none" : "inline";';
				echo 'document.getElementById("plus"+id).style.display = state == "inline" ? "inline" : "none";';
				echo '}</script>'."\n";
			}

			$type = !is_string($data) && is_callable($data) ? "Callable" : ucfirst(gettype($data));
			$type_data = null;
			$type_color = null;
			$type_length = null;

			switch ($type)
			{
				case "String":
				$type_color = "green";
				$type_length = strlen($data);
				$type_data = "\"" . htmlentities($data) . "\""; break;

				case "Double":
				case "Float":
				$type = "Float";
				$type_color = "#0099c5";
				$type_length = strlen($data);
				$type_data = htmlentities($data); break;

				case "Integer":
				$type_color = "red";
				$type_length = strlen($data);
				$type_data = htmlentities($data); break;

				case "Boolean":
				$type_color = "#92008d";
				$type_length = strlen($data);
				$type_data = $data ? "TRUE" : "FALSE"; break;

				case "NULL":
				$type_length = 0; break;

				case "Array":
				$type_length = count($data);
			}

			if (in_array($type, array("Object", "Array")))
			{
				$notEmpty = false;

				foreach($data as $key => $value)
				{
					if (!$notEmpty)
					{
						$notEmpty = true;

						if ($isTerminal)
						{
							echo $type . ($type_length !== null ? "(" . $type_length . ")" : "")."\n";

						}
						else
						{
							$id = substr(md5(rand().":".$key.":".$level), 0, 8);

							echo "<a href=\"javascript:toggleDisplay('". $id ."');\" style=\"text-decoration:none\">";
							echo "<span style='color:#666666'>" . $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "</span>";
							echo "</a>";
							echo "<span id=\"plus". $id ."\" style=\"display: " . ($collapse ? "inline" : "none") . ";\">&nbsp;&#10549;</span>";
							echo "<div id=\"container". $id ."\" style=\"display: " . ($collapse ? "" : "inline") . ";\">";
							echo "<br />";
						}

						for ($i=0; $i <= $level; $i++)
						{
							echo $isTerminal ? "|    " : "<span style='color:black'>|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						}

						echo $isTerminal ? "\n" : "<br />";
					}

					for ($i=0; $i <= $level; $i++)
					{
						echo $isTerminal ? "|    " : "<span style='color:black'>|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					}

					echo $isTerminal ? "[" . $key . "] => " : "<span style='color:black'>[" . $key . "]&nbsp;=>&nbsp;</span>";

					call_user_func($recursive, $value, $level+1);
				}

				if ($notEmpty)
				{
					for ($i=0; $i <= $level; $i++)
					{
						echo $isTerminal ? "|    " : "<span style='color:black'>|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					}

					if (!$isTerminal)
					{
						echo "</div>";
					}

				}
				else
				{
					echo $isTerminal ? $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "  " : "<span style='color:#666666'>" . $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "</span>&nbsp;&nbsp;";
				}

			}
			else
			{
				echo $isTerminal ? $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "  " : "<span style='color:#666666'>" . $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "</span>&nbsp;&nbsp;";

				if ($type_data != null)
				{
					echo $isTerminal ? $type_data : "<span style='color:" . $type_color . "'>" . $type_data . "</span>";
				}
			}

			echo $isTerminal ? "\n" : "<br />";
		};

		call_user_func($recursive, $input);
	}
}

// include javascript sources file
if ( ! function_exists('script_tag'))
{
	function script_tag($href = '', $type = 'text/javascript', $index_page = FALSE)
	{
		$CI =& get_instance();
		$link = '<script ';

		if (is_array($href))
		{
			foreach ($href as $k => $v)
			{
				if ($k === 'src' && ! preg_match('#^([a-z]+:)?//#i', $v))
				{
					if ($index_page === TRUE)
					{
						$link .= 'src="'.$CI->config->site_url($v).'" ';
					}
					else
					{
						$link .= 'src="'.$CI->config->slash_item('base_url').$v.'" ';
					}
				}
				else
				{
					$link .= $k.'="'.$v.'" ';
				}
			}
		}
		else
		{
			if (preg_match('#^([a-z]+:)?//#i', $href))
			{
				$link .= 'src="'.$href.'" ';
			}
			elseif ($index_page === TRUE)
			{
				$link .= 'src="'.$CI->config->site_url($href).'" ';
			}
			else
			{
				$link .= 'src="'.$CI->config->slash_item('base_url').$href.'" ';
			}

			$link .= 'type="'.$type.'" ';
		}

		return $link." charset='UTF-8'></script>\n";
	}
}

if ( ! function_exists('group_product'))
{
	function group_product($index=FALSE)
	{
		$array = array('1'=>'Samsung','2'=>'Non Samsung');

		return $index ? $array[$index] : $array;
	}
}
