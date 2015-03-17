<?php

namespace Cviebrock\Twig;

class GroupExtension extends \Twig_Extension {

	/**
	 * Return extension name
	 *
	 * @return string
	 */
	public function getName() {
		return 'cviebrock/group';
	}


	/**
	 * Callback for Twig
	 *
	 * @ignore
	 */
	public function getFilters() {
		return [
			'group' => new \Twig_Filter_Method($this, 'group')
		];
	}


	public function group($array, $groups, $extraEntry = null) {
		if ($array instanceof \Traversable) {
			$array = iterator_to_array($array, false);
		}

		// if moving into 1 (or fewer) groups, just return original array
		if ($groups <= 1) {
			return $array;
		}

		// add any extra entries, if needed
		if ($extraEntry !== null) {
			while (count($array) % $groups) {
				$array[] = $extraEntry;
			}
		}

		// calculate items per group
		$perGroup = count($array) / $groups;

		// chunk it
		return array_chunk($array, $perGroup, true);
	}
}
