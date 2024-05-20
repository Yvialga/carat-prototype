<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240520145239 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE answers_storage ADD fk_answers_storage_to_questions_storage_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE answers_storage ADD CONSTRAINT FK_63BD8A9B56F20810 FOREIGN KEY (fk_answers_storage_to_questions_storage_id_id) REFERENCES questions_storage (id)');
        $this->addSql('CREATE INDEX IDX_63BD8A9B56F20810 ON answers_storage (fk_answers_storage_to_questions_storage_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE answers_storage DROP FOREIGN KEY FK_63BD8A9B56F20810');
        $this->addSql('DROP INDEX IDX_63BD8A9B56F20810 ON answers_storage');
        $this->addSql('ALTER TABLE answers_storage DROP fk_answers_storage_to_questions_storage_id_id');
    }
}
