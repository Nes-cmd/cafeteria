<?php
namespace App\MyClasses;
use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;

class ImageFilter implements FilterInterface
{
	private $fit;
	const FIT = 400;
	function __construct($fit = null)
	{
		$this->fit = is_numeric($fit)? $fit:self::FIT;
	}
	public function applyFilter(Image $image)
	{
		$image->fit($this->fit);
		return $image;
	}
}
?>