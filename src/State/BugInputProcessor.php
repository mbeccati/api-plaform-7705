<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Dto\BugInput;
use App\Entity\Bug7705;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

/**
 * @implements ProcessorInterface<BugInput, Bug7705>
 */
class BugInputProcessor implements ProcessorInterface
{
    public function __construct(
        /** @var ProcessorInterface<mixed,mixed> */
        #[Autowire(service: 'api_platform.doctrine.orm.state.persist_processor')]
        private readonly ProcessorInterface $persist,
    ) {}

    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = [])
    {
        $bug7705 = new Bug7705();

        // CamelName here is not set!
        $bug7705->bugName = $data->camelName;

        return $this->persist->process($bug7705, $operation, $uriVariables, $context);
    }
}
