<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210924152804 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE job_profession (job_id INT NOT NULL, profession_id INT NOT NULL, INDEX IDX_D0E49D74BE04EA9 (job_id), INDEX IDX_D0E49D74FDEF8996 (profession_id), PRIMARY KEY(job_id, profession_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE job_profession ADD CONSTRAINT FK_D0E49D74BE04EA9 FOREIGN KEY (job_id) REFERENCES job (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE job_profession ADD CONSTRAINT FK_D0E49D74FDEF8996 FOREIGN KEY (profession_id) REFERENCES profession (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE company_profession');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE company_profession (company_id INT NOT NULL, profession_id INT NOT NULL, INDEX IDX_71DE4FF979B1AD6 (company_id), INDEX IDX_71DE4FFFDEF8996 (profession_id), PRIMARY KEY(company_id, profession_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE company_profession ADD CONSTRAINT FK_71DE4FF979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE company_profession ADD CONSTRAINT FK_71DE4FFFDEF8996 FOREIGN KEY (profession_id) REFERENCES profession (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('DROP TABLE job_profession');
    }
}
