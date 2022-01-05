<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220105165234 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE "belongTo" (category_id INT NOT NULL, program_id INT NOT NULL, PRIMARY KEY(category_id, program_id))');
        $this->addSql('CREATE INDEX IDX_DF8D8D5C12469DE2 ON "belongTo" (category_id)');
        $this->addSql('CREATE INDEX IDX_DF8D8D5C3EB8070A ON "belongTo" (program_id)');
        $this->addSql('ALTER TABLE "belongTo" ADD CONSTRAINT FK_DF8D8D5C12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "belongTo" ADD CONSTRAINT FK_DF8D8D5C3EB8070A FOREIGN KEY (program_id) REFERENCES program (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE category_program');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE category_program (category_id INT NOT NULL, program_id INT NOT NULL, PRIMARY KEY(category_id, program_id))');
        $this->addSql('CREATE INDEX idx_553537fa12469de2 ON category_program (category_id)');
        $this->addSql('CREATE INDEX idx_553537fa3eb8070a ON category_program (program_id)');
        $this->addSql('ALTER TABLE category_program ADD CONSTRAINT fk_553537fa12469de2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE category_program ADD CONSTRAINT fk_553537fa3eb8070a FOREIGN KEY (program_id) REFERENCES program (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE "belongTo"');
    }
}
