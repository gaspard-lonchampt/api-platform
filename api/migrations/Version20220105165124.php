<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220105165124 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE "favoriteBy" (program_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(program_id, user_id))');
        $this->addSql('CREATE INDEX IDX_F0B54E543EB8070A ON "favoriteBy" (program_id)');
        $this->addSql('CREATE INDEX IDX_F0B54E54A76ED395 ON "favoriteBy" (user_id)');
        $this->addSql('ALTER TABLE "favoriteBy" ADD CONSTRAINT FK_F0B54E543EB8070A FOREIGN KEY (program_id) REFERENCES program (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "favoriteBy" ADD CONSTRAINT FK_F0B54E54A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE program_user');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE program_user (program_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(program_id, user_id))');
        $this->addSql('CREATE INDEX idx_8075834ea76ed395 ON program_user (user_id)');
        $this->addSql('CREATE INDEX idx_8075834e3eb8070a ON program_user (program_id)');
        $this->addSql('ALTER TABLE program_user ADD CONSTRAINT fk_8075834e3eb8070a FOREIGN KEY (program_id) REFERENCES program (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE program_user ADD CONSTRAINT fk_8075834ea76ed395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE "favoriteBy"');
    }
}
