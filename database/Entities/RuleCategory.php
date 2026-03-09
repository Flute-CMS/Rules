<?php

namespace Flute\Modules\Rules\database\Entities;

use Cycle\ActiveRecord\ActiveRecord;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\BelongsTo;
use Cycle\Annotated\Annotation\Relation\HasMany;
use Cycle\Annotated\Annotation\Table;
use Cycle\Annotated\Annotation\Table\Index;
use Cycle\ORM\Entity\Behavior;
use DateTimeImmutable;

#[Entity]
#[Table(indexes: [new Index(columns: ["slug"], unique: true)])]
#[Behavior\CreatedAt(
    field: 'createdAt',
    column: 'created_at'
)]
#[Behavior\UpdatedAt(
    field: 'updatedAt',
    column: 'updated_at'
)]
class RuleCategory extends ActiveRecord
{
    #[Column(type: "primary")]
    public int $id;

    #[Column(type: "string")]
    public string $name;

    #[Column(type: "string")]
    public string $slug;

    #[Column(type: "text", nullable: true)]
    public ?string $content = null;

    #[Column(type: "integer", nullable: true)]
    public ?int $sort_order = 0;

    #[Column(type: "boolean", default: true)]
    public bool $active = true;

    #[BelongsTo(target: RuleCategory::class, nullable: true, innerKey: "parent_id")]
    public ?RuleCategory $parent = null;

    #[HasMany(target: RuleCategory::class, nullable: true, outerKey: "parent_id")]
    public array $children = [];

    #[Column(type: "datetime")]
    public DateTimeImmutable $createdAt;

    #[Column(type: "datetime", nullable: true)]
    public ?DateTimeImmutable $updatedAt = null;

    public function getActiveChildren(): array
    {
        return array_filter($this->children, static fn ($child) => $child->active);
    }
}
