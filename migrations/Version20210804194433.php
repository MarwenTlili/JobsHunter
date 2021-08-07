<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210804194433 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activity (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, activity_id INT NOT NULL, country_id INT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, full_address VARCHAR(255) NOT NULL, phone VARCHAR(15) NOT NULL, website VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, trn VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_4FBF094FA76ED395 (user_id), INDEX IDX_4FBF094F81C06096 (activity_id), INDEX IDX_4FBF094FF92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, iso VARCHAR(2) NOT NULL, name VARCHAR(255) NOT NULL, nice_name VARCHAR(255) NOT NULL, iso3 VARCHAR(3) NOT NULL, num_code SMALLINT NOT NULL, phone_code INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job (id INT AUTO_INCREMENT NOT NULL, company_id INT NOT NULL, country_id INT NOT NULL, title VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expire_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', posts_number SMALLINT NOT NULL, type VARCHAR(255) NOT NULL, experience_min SMALLINT NOT NULL, experience_max SMALLINT NOT NULL, education_level VARCHAR(255) NOT NULL, required_languages VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, requirements LONGTEXT NOT NULL, INDEX IDX_FBD8E0F8979B1AD6 (company_id), INDEX IDX_FBD8E0F8F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_tag (job_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_C75C2412BE04EA9 (job_id), INDEX IDX_C75C2412BAD26311 (tag_id), PRIMARY KEY(job_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seeker (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, country_id INT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, civility VARCHAR(255) NOT NULL, birth_date DATE NOT NULL, city VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_835D8AF3A76ED395 (user_id), INDEX IDX_835D8AF3F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seeker_saved_jobs (seeker_id INT NOT NULL, job_id INT NOT NULL, INDEX IDX_7A48D31557555B2 (seeker_id), INDEX IDX_7A48D315BE04EA9 (job_id), PRIMARY KEY(seeker_id, job_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seeker_applyed_jobs (seeker_id INT NOT NULL, job_id INT NOT NULL, INDEX IDX_7999FFF157555B2 (seeker_id), INDEX IDX_7999FFF1BE04EA9 (job_id), PRIMARY KEY(seeker_id, job_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE training (id INT AUTO_INCREMENT NOT NULL, country_id INT NOT NULL, company_id INT NOT NULL, title VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, full_address VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', description LONGTEXT NOT NULL, about LONGTEXT NOT NULL, INDEX IDX_D5128A8FF92F3E70 (country_id), INDEX IDX_D5128A8F979B1AD6 (company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', username VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094F81C06096 FOREIGN KEY (activity_id) REFERENCES activity (id)');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094FF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F8979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F8F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE job_tag ADD CONSTRAINT FK_C75C2412BE04EA9 FOREIGN KEY (job_id) REFERENCES job (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE job_tag ADD CONSTRAINT FK_C75C2412BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE seeker ADD CONSTRAINT FK_835D8AF3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE seeker ADD CONSTRAINT FK_835D8AF3F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE seeker_saved_jobs ADD CONSTRAINT FK_7A48D31557555B2 FOREIGN KEY (seeker_id) REFERENCES seeker (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE seeker_saved_jobs ADD CONSTRAINT FK_7A48D315BE04EA9 FOREIGN KEY (job_id) REFERENCES job (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE seeker_applyed_jobs ADD CONSTRAINT FK_7999FFF157555B2 FOREIGN KEY (seeker_id) REFERENCES seeker (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE seeker_applyed_jobs ADD CONSTRAINT FK_7999FFF1BE04EA9 FOREIGN KEY (job_id) REFERENCES job (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE training ADD CONSTRAINT FK_D5128A8FF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE training ADD CONSTRAINT FK_D5128A8F979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094F81C06096');
        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F8979B1AD6');
        $this->addSql('ALTER TABLE training DROP FOREIGN KEY FK_D5128A8F979B1AD6');
        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094FF92F3E70');
        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F8F92F3E70');
        $this->addSql('ALTER TABLE seeker DROP FOREIGN KEY FK_835D8AF3F92F3E70');
        $this->addSql('ALTER TABLE training DROP FOREIGN KEY FK_D5128A8FF92F3E70');
        $this->addSql('ALTER TABLE job_tag DROP FOREIGN KEY FK_C75C2412BE04EA9');
        $this->addSql('ALTER TABLE seeker_saved_jobs DROP FOREIGN KEY FK_7A48D315BE04EA9');
        $this->addSql('ALTER TABLE seeker_applyed_jobs DROP FOREIGN KEY FK_7999FFF1BE04EA9');
        $this->addSql('ALTER TABLE seeker_saved_jobs DROP FOREIGN KEY FK_7A48D31557555B2');
        $this->addSql('ALTER TABLE seeker_applyed_jobs DROP FOREIGN KEY FK_7999FFF157555B2');
        $this->addSql('ALTER TABLE job_tag DROP FOREIGN KEY FK_C75C2412BAD26311');
        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094FA76ED395');
        $this->addSql('ALTER TABLE seeker DROP FOREIGN KEY FK_835D8AF3A76ED395');
        $this->addSql('DROP TABLE activity');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE job');
        $this->addSql('DROP TABLE job_tag');
        $this->addSql('DROP TABLE seeker');
        $this->addSql('DROP TABLE seeker_saved_jobs');
        $this->addSql('DROP TABLE seeker_applyed_jobs');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE training');
        $this->addSql('DROP TABLE user');
    }
}
