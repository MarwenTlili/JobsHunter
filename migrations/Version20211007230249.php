<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211007230249 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE seeker ADD cv_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE seeker ADD CONSTRAINT FK_835D8AF3CFE419E2 FOREIGN KEY (cv_id) REFERENCES cv (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_835D8AF3CFE419E2 ON seeker (cv_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE seeker DROP FOREIGN KEY FK_835D8AF3CFE419E2');
        $this->addSql('DROP INDEX UNIQ_835D8AF3CFE419E2 ON seeker');
        $this->addSql('ALTER TABLE seeker DROP cv_id');
    }
}
