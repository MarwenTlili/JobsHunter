<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211006180453 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, country_id INT NOT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) DEFAULT NULL, phone VARCHAR(15) DEFAULT NULL, website VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, trn VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_4FBF094FA76ED395 (user_id), INDEX IDX_4FBF094FF92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, iso VARCHAR(2) NOT NULL, name VARCHAR(255) NOT NULL, nice_name VARCHAR(255) NOT NULL, iso3 VARCHAR(3) NOT NULL, num_code SMALLINT NOT NULL, phone_code INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cv (id INT AUTO_INCREMENT NOT NULL, professional_information_id INT DEFAULT NULL, professional_interest_id INT DEFAULT NULL, general_information_id INT DEFAULT NULL, social_link_id INT DEFAULT NULL, education_level VARCHAR(255) DEFAULT NULL, years_of_experience VARCHAR(255) DEFAULT NULL, last_update_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', views INT DEFAULT NULL, UNIQUE INDEX UNIQ_B66FFE927C86B91C (professional_information_id), UNIQUE INDEX UNIQ_B66FFE92E81F99D9 (professional_interest_id), UNIQUE INDEX UNIQ_B66FFE9281172FF4 (general_information_id), UNIQUE INDEX UNIQ_B66FFE9222DFD7EC (social_link_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document (id INT AUTO_INCREMENT NOT NULL, cv_id INT NOT NULL, diploma VARCHAR(255) DEFAULT NULL, realisation VARCHAR(255) DEFAULT NULL, INDEX IDX_D8698A76CFE419E2 (cv_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE education (id INT AUTO_INCREMENT NOT NULL, cv_id INT NOT NULL, diploma_title VARCHAR(255) DEFAULT NULL, establishment VARCHAR(255) DEFAULT NULL, start_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', end_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', current TINYINT(1) DEFAULT NULL, INDEX IDX_DB0A5ED2CFE419E2 (cv_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, cv_id INT NOT NULL, company VARCHAR(255) DEFAULT NULL, job_title VARCHAR(255) DEFAULT NULL, start_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', end_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', current TINYINT(1) DEFAULT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_590C103CFE419E2 (cv_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE general_information (id INT AUTO_INCREMENT NOT NULL, country_id INT DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, motivation LONGTEXT DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, region VARCHAR(255) DEFAULT NULL, postal_code INT DEFAULT NULL, have_driving_licence TINYINT(1) DEFAULT NULL, own_acar TINYINT(1) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, phone2 VARCHAR(255) DEFAULT NULL, INDEX IDX_AE028473F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job (id INT AUTO_INCREMENT NOT NULL, company_id INT NOT NULL, country_id INT NOT NULL, title VARCHAR(255) NOT NULL, address VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expire_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', posts_number SMALLINT NOT NULL, type VARCHAR(255) DEFAULT NULL, experience_min SMALLINT DEFAULT NULL, experience_max SMALLINT DEFAULT NULL, education_level VARCHAR(255) DEFAULT NULL, salary_min INT DEFAULT NULL, salay_max INT DEFAULT NULL, required_languages VARCHAR(255) DEFAULT NULL, description LONGTEXT NOT NULL, requirements LONGTEXT NOT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_FBD8E0F8979B1AD6 (company_id), INDEX IDX_FBD8E0F8F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_tag (job_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_C75C2412BE04EA9 (job_id), INDEX IDX_C75C2412BAD26311 (tag_id), PRIMARY KEY(job_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_profession (job_id INT NOT NULL, profession_id INT NOT NULL, INDEX IDX_D0E49D74BE04EA9 (job_id), INDEX IDX_D0E49D74FDEF8996 (profession_id), PRIMARY KEY(job_id, profession_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profession (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professional_information (id INT AUTO_INCREMENT NOT NULL, languages VARCHAR(255) DEFAULT NULL, skills LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professional_interest (id INT AUTO_INCREMENT NOT NULL, level VARCHAR(255) DEFAULT NULL, job_type VARCHAR(255) DEFAULT NULL, wanted_occupation VARCHAR(255) DEFAULT NULL, wanted_salary DOUBLE PRECISION DEFAULT NULL, actual_status VARCHAR(255) DEFAULT NULL, find_me_by_company TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professional_interest_profession (professional_interest_id INT NOT NULL, profession_id INT NOT NULL, INDEX IDX_996027ECE81F99D9 (professional_interest_id), INDEX IDX_996027ECFDEF8996 (profession_id), PRIMARY KEY(professional_interest_id, profession_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seeker (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, country_id INT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, civility VARCHAR(255) NOT NULL, birth_date DATE NOT NULL, address VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_835D8AF3A76ED395 (user_id), INDEX IDX_835D8AF3F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seeker_saved_jobs (seeker_id INT NOT NULL, job_id INT NOT NULL, INDEX IDX_7A48D31557555B2 (seeker_id), INDEX IDX_7A48D315BE04EA9 (job_id), PRIMARY KEY(seeker_id, job_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seeker_applyed_jobs (seeker_id INT NOT NULL, job_id INT NOT NULL, INDEX IDX_7999FFF157555B2 (seeker_id), INDEX IDX_7999FFF1BE04EA9 (job_id), PRIMARY KEY(seeker_id, job_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE social_link (id INT AUTO_INCREMENT NOT NULL, github VARCHAR(255) DEFAULT NULL, facebook VARCHAR(255) DEFAULT NULL, twitter VARCHAR(255) DEFAULT NULL, instagram VARCHAR(255) DEFAULT NULL, youtube VARCHAR(255) DEFAULT NULL, stackoverflow VARCHAR(255) DEFAULT NULL, website VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE training (id INT AUTO_INCREMENT NOT NULL, country_id INT NOT NULL, company_id INT NOT NULL, title VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', description LONGTEXT NOT NULL, about LONGTEXT DEFAULT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_D5128A8FF92F3E70 (country_id), INDEX IDX_D5128A8F979B1AD6 (company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', username VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094FF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE cv ADD CONSTRAINT FK_B66FFE927C86B91C FOREIGN KEY (professional_information_id) REFERENCES professional_information (id)');
        $this->addSql('ALTER TABLE cv ADD CONSTRAINT FK_B66FFE92E81F99D9 FOREIGN KEY (professional_interest_id) REFERENCES professional_interest (id)');
        $this->addSql('ALTER TABLE cv ADD CONSTRAINT FK_B66FFE9281172FF4 FOREIGN KEY (general_information_id) REFERENCES general_information (id)');
        $this->addSql('ALTER TABLE cv ADD CONSTRAINT FK_B66FFE9222DFD7EC FOREIGN KEY (social_link_id) REFERENCES social_link (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A76CFE419E2 FOREIGN KEY (cv_id) REFERENCES cv (id)');
        $this->addSql('ALTER TABLE education ADD CONSTRAINT FK_DB0A5ED2CFE419E2 FOREIGN KEY (cv_id) REFERENCES cv (id)');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C103CFE419E2 FOREIGN KEY (cv_id) REFERENCES cv (id)');
        $this->addSql('ALTER TABLE general_information ADD CONSTRAINT FK_AE028473F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F8979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F8F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE job_tag ADD CONSTRAINT FK_C75C2412BE04EA9 FOREIGN KEY (job_id) REFERENCES job (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE job_tag ADD CONSTRAINT FK_C75C2412BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE job_profession ADD CONSTRAINT FK_D0E49D74BE04EA9 FOREIGN KEY (job_id) REFERENCES job (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE job_profession ADD CONSTRAINT FK_D0E49D74FDEF8996 FOREIGN KEY (profession_id) REFERENCES profession (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE professional_interest_profession ADD CONSTRAINT FK_996027ECE81F99D9 FOREIGN KEY (professional_interest_id) REFERENCES professional_interest (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE professional_interest_profession ADD CONSTRAINT FK_996027ECFDEF8996 FOREIGN KEY (profession_id) REFERENCES profession (id) ON DELETE CASCADE');
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
        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F8979B1AD6');
        $this->addSql('ALTER TABLE training DROP FOREIGN KEY FK_D5128A8F979B1AD6');
        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094FF92F3E70');
        $this->addSql('ALTER TABLE general_information DROP FOREIGN KEY FK_AE028473F92F3E70');
        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F8F92F3E70');
        $this->addSql('ALTER TABLE seeker DROP FOREIGN KEY FK_835D8AF3F92F3E70');
        $this->addSql('ALTER TABLE training DROP FOREIGN KEY FK_D5128A8FF92F3E70');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A76CFE419E2');
        $this->addSql('ALTER TABLE education DROP FOREIGN KEY FK_DB0A5ED2CFE419E2');
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY FK_590C103CFE419E2');
        $this->addSql('ALTER TABLE cv DROP FOREIGN KEY FK_B66FFE9281172FF4');
        $this->addSql('ALTER TABLE job_tag DROP FOREIGN KEY FK_C75C2412BE04EA9');
        $this->addSql('ALTER TABLE job_profession DROP FOREIGN KEY FK_D0E49D74BE04EA9');
        $this->addSql('ALTER TABLE seeker_saved_jobs DROP FOREIGN KEY FK_7A48D315BE04EA9');
        $this->addSql('ALTER TABLE seeker_applyed_jobs DROP FOREIGN KEY FK_7999FFF1BE04EA9');
        $this->addSql('ALTER TABLE job_profession DROP FOREIGN KEY FK_D0E49D74FDEF8996');
        $this->addSql('ALTER TABLE professional_interest_profession DROP FOREIGN KEY FK_996027ECFDEF8996');
        $this->addSql('ALTER TABLE cv DROP FOREIGN KEY FK_B66FFE927C86B91C');
        $this->addSql('ALTER TABLE cv DROP FOREIGN KEY FK_B66FFE92E81F99D9');
        $this->addSql('ALTER TABLE professional_interest_profession DROP FOREIGN KEY FK_996027ECE81F99D9');
        $this->addSql('ALTER TABLE seeker_saved_jobs DROP FOREIGN KEY FK_7A48D31557555B2');
        $this->addSql('ALTER TABLE seeker_applyed_jobs DROP FOREIGN KEY FK_7999FFF157555B2');
        $this->addSql('ALTER TABLE cv DROP FOREIGN KEY FK_B66FFE9222DFD7EC');
        $this->addSql('ALTER TABLE job_tag DROP FOREIGN KEY FK_C75C2412BAD26311');
        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094FA76ED395');
        $this->addSql('ALTER TABLE seeker DROP FOREIGN KEY FK_835D8AF3A76ED395');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE cv');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE education');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE general_information');
        $this->addSql('DROP TABLE job');
        $this->addSql('DROP TABLE job_tag');
        $this->addSql('DROP TABLE job_profession');
        $this->addSql('DROP TABLE profession');
        $this->addSql('DROP TABLE professional_information');
        $this->addSql('DROP TABLE professional_interest');
        $this->addSql('DROP TABLE professional_interest_profession');
        $this->addSql('DROP TABLE seeker');
        $this->addSql('DROP TABLE seeker_saved_jobs');
        $this->addSql('DROP TABLE seeker_applyed_jobs');
        $this->addSql('DROP TABLE social_link');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE training');
        $this->addSql('DROP TABLE user');
    }
}
