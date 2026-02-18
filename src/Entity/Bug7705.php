<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use App\Controller\BugInputController;
use App\Dto\BugInput;
use App\State\BugInputProcessor;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ApiResource]
#[Post]
#[Get]
#[GetCollection]
#[Post(
    uriTemplate: 'bug7705-dto',
    input: BugInput::class,
    processor: BugInputProcessor::class,
)]
#[Post(
    uriTemplate: 'bug7705-controller',
    controller: BugInputController::class,
    input: BugInput::class,
    output: BugInput::class,

)]
class Bug7705
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public int $id;

    #[ORM\Column(length: 255)]
    public string $bugName;
}
