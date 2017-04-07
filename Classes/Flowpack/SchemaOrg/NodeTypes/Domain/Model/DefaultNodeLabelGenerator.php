<?php
namespace Flowpack\SchemaOrg\NodeTypes\Domain\Model;

/*                                                                               *
 * This script belongs to the TYPO3 Flow package "Flowpack.SchemaOrg.NodeTypes". *
 *                                                                               *
 * It is free software; you can redistribute it and/or modify it under           *
 * the terms of the GNU Lesser General Public License, either version 3          *
 * of the License, or (at your option) any later version.                        *
 *                                                                               *
 * The TYPO3 project - inspiring people to share!                                *
 *                                                                               */

use Neos\Flow\Annotations as Flow;
use Neos\ContentRepository\Domain\Model\AbstractNodeData;
use Neos\ContentRepository\Domain\Model\NodeInterface;
use Neos\ContentRepository\Domain\Model\NodeDataLabelGeneratorInterface;

/**
 * The default node label generator; used if no-other is configured
 *
 * @Flow\Scope("singleton")
 */
class FallbackNodeDataLabelGenerator implements NodeDataLabelGeneratorInterface {

	/**
	 * Render a node label
	 *
	 * @param NodeInterface $node
	 * @param boolean $crop
	 * @return string
	 */
	public function getLabel(NodeInterface $node, $crop = TRUE) {
		if ($node->hasProperty('name') === TRUE && $node->getProperty('name') !== '') {
			$label = strip_tags($node->getProperty('name'));
		} else {
			$label = ($node->getNodeType()->getLabel() ?: $node->getNodeType()->getName()) . ' (' . $node->getName() . ')';
		}

		return $label;
	}
}
