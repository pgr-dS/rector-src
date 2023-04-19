<?php

declare(strict_types=1);

namespace Rector\TypeDeclaration\Rector\BooleanAnd;

use PhpParser\Node\Expr\BinaryOp\BooleanAnd;
use PhpParser\Node\Expr\BinaryOp\BooleanOr;
use PhpParser\Node;
use Rector\Core\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @see \Rector\Tests\TypeDeclaration\Rector\BooleanAnd\BinaryOpNullableToInstanceofRector\BinaryOpNullableToInstanceofRectorTest
 */
final class BinaryOpNullableToInstanceofRector extends AbstractRector
{
    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition('Change && and || between nullable objects to instanceof compares', [
            new CodeSample(
                <<<'CODE_SAMPLE'
function someFunction(?SomeClass $someClass)
{
    if ($someClass && $someClass->someMethod()) {
        return 'yes';
    }

    return 'no';
}
CODE_SAMPLE

                ,
                <<<'CODE_SAMPLE'
function someFunction(?SomeClass $someClass)
{
    if ($someClass instanceof SomeClass && $someClass->someMethod()) {
        return 'yes';
    }

    return 'no';
}
CODE_SAMPLE
            ),
        ]);
    }

    /**
     * @return array<class-string<Node>>
     */
    public function getNodeTypes(): array
    {
        return [BooleanAnd::class, BooleanOr::class];
    }

    /**
     * @param BooleanAnd|BooleanOr $node
     */
    public function refactor(Node $node): ?Node
    {
        // change the node

        return $node;
    }
}
