<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220414150010 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_880E0D76E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE answer (id INT AUTO_INCREMENT NOT NULL, question_id INT NOT NULL, answer VARCHAR(255) NOT NULL, is_correct TINYINT(1) NOT NULL, INDEX IDX_DADD4A251E27F6BF (question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE instructor (id INT AUTO_INCREMENT NOT NULL, instructor_statut_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, pseudo VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_31FC43DDE7927C74 (email), INDEX IDX_31FC43DD509C0DC1 (instructor_statut_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE instructor_speciality (instructor_id INT NOT NULL, speciality_id INT NOT NULL, INDEX IDX_187F2A848C4FC193 (instructor_id), INDEX IDX_187F2A843B5A08D7 (speciality_id), PRIMARY KEY(instructor_id, speciality_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE instructor_statut (id INT AUTO_INCREMENT NOT NULL, statut VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lesson (id INT AUTO_INCREMENT NOT NULL, section_id INT NOT NULL, lesson_statut_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, video_url LONGTEXT NOT NULL, lesson LONGTEXT NOT NULL, INDEX IDX_F87474F3D823E37A (section_id), INDEX IDX_F87474F39203D78E (lesson_statut_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lesson_statut (id INT AUTO_INCREMENT NOT NULL, is_finish TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_img (id INT AUTO_INCREMENT NOT NULL, instructor_id INT NOT NULL, name VARCHAR(255) NOT NULL, file_url VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8EEF07E18C4FC193 (instructor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, quiz_id INT DEFAULT NULL, question VARCHAR(255) NOT NULL, INDEX IDX_B6F7494E853CD175 (quiz_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quiz (id INT AUTO_INCREMENT NOT NULL, section_id INT NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_A412FA92D823E37A (section_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ressource (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, file_url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ressource_lesson (ressource_id INT NOT NULL, lesson_id INT NOT NULL, INDEX IDX_1235A74EFC6CD52A (ressource_id), INDEX IDX_1235A74ECDF80196 (lesson_id), PRIMARY KEY(ressource_id, lesson_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section (id INT AUTO_INCREMENT NOT NULL, training_id INT NOT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_2D737AEFBEFD98D1 (training_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE speciality (id INT AUTO_INCREMENT NOT NULL, speciality VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, lesson_statut_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, pseudo VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_B723AF33E7927C74 (email), INDEX IDX_B723AF339203D78E (lesson_statut_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student_training (student_id INT NOT NULL, training_id INT NOT NULL, INDEX IDX_6699C614CB944F1A (student_id), INDEX IDX_6699C614BEFD98D1 (training_id), PRIMARY KEY(student_id, training_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE training (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, create_at DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE training_instructor (training_id INT NOT NULL, instructor_id INT NOT NULL, INDEX IDX_8B42F9BBBEFD98D1 (training_id), INDEX IDX_8B42F9BB8C4FC193 (instructor_id), PRIMARY KEY(training_id, instructor_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE training_img (id INT AUTO_INCREMENT NOT NULL, training_id INT NOT NULL, name VARCHAR(255) NOT NULL, file_url VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_217CBFE5BEFD98D1 (training_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A251E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE instructor ADD CONSTRAINT FK_31FC43DD509C0DC1 FOREIGN KEY (instructor_statut_id) REFERENCES instructor_statut (id)');
        $this->addSql('ALTER TABLE instructor_speciality ADD CONSTRAINT FK_187F2A848C4FC193 FOREIGN KEY (instructor_id) REFERENCES instructor (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE instructor_speciality ADD CONSTRAINT FK_187F2A843B5A08D7 FOREIGN KEY (speciality_id) REFERENCES speciality (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F3D823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F39203D78E FOREIGN KEY (lesson_statut_id) REFERENCES lesson_statut (id)');
        $this->addSql('ALTER TABLE profil_img ADD CONSTRAINT FK_8EEF07E18C4FC193 FOREIGN KEY (instructor_id) REFERENCES instructor (id)');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E853CD175 FOREIGN KEY (quiz_id) REFERENCES quiz (id)');
        $this->addSql('ALTER TABLE quiz ADD CONSTRAINT FK_A412FA92D823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
        $this->addSql('ALTER TABLE ressource_lesson ADD CONSTRAINT FK_1235A74EFC6CD52A FOREIGN KEY (ressource_id) REFERENCES ressource (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ressource_lesson ADD CONSTRAINT FK_1235A74ECDF80196 FOREIGN KEY (lesson_id) REFERENCES lesson (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE section ADD CONSTRAINT FK_2D737AEFBEFD98D1 FOREIGN KEY (training_id) REFERENCES training (id)');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF339203D78E FOREIGN KEY (lesson_statut_id) REFERENCES lesson_statut (id)');
        $this->addSql('ALTER TABLE student_training ADD CONSTRAINT FK_6699C614CB944F1A FOREIGN KEY (student_id) REFERENCES student (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student_training ADD CONSTRAINT FK_6699C614BEFD98D1 FOREIGN KEY (training_id) REFERENCES training (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE training_instructor ADD CONSTRAINT FK_8B42F9BBBEFD98D1 FOREIGN KEY (training_id) REFERENCES training (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE training_instructor ADD CONSTRAINT FK_8B42F9BB8C4FC193 FOREIGN KEY (instructor_id) REFERENCES instructor (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE training_img ADD CONSTRAINT FK_217CBFE5BEFD98D1 FOREIGN KEY (training_id) REFERENCES training (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE instructor_speciality DROP FOREIGN KEY FK_187F2A848C4FC193');
        $this->addSql('ALTER TABLE profil_img DROP FOREIGN KEY FK_8EEF07E18C4FC193');
        $this->addSql('ALTER TABLE training_instructor DROP FOREIGN KEY FK_8B42F9BB8C4FC193');
        $this->addSql('ALTER TABLE instructor DROP FOREIGN KEY FK_31FC43DD509C0DC1');
        $this->addSql('ALTER TABLE ressource_lesson DROP FOREIGN KEY FK_1235A74ECDF80196');
        $this->addSql('ALTER TABLE lesson DROP FOREIGN KEY FK_F87474F39203D78E');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF339203D78E');
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A251E27F6BF');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E853CD175');
        $this->addSql('ALTER TABLE ressource_lesson DROP FOREIGN KEY FK_1235A74EFC6CD52A');
        $this->addSql('ALTER TABLE lesson DROP FOREIGN KEY FK_F87474F3D823E37A');
        $this->addSql('ALTER TABLE quiz DROP FOREIGN KEY FK_A412FA92D823E37A');
        $this->addSql('ALTER TABLE instructor_speciality DROP FOREIGN KEY FK_187F2A843B5A08D7');
        $this->addSql('ALTER TABLE student_training DROP FOREIGN KEY FK_6699C614CB944F1A');
        $this->addSql('ALTER TABLE section DROP FOREIGN KEY FK_2D737AEFBEFD98D1');
        $this->addSql('ALTER TABLE student_training DROP FOREIGN KEY FK_6699C614BEFD98D1');
        $this->addSql('ALTER TABLE training_instructor DROP FOREIGN KEY FK_8B42F9BBBEFD98D1');
        $this->addSql('ALTER TABLE training_img DROP FOREIGN KEY FK_217CBFE5BEFD98D1');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE answer');
        $this->addSql('DROP TABLE instructor');
        $this->addSql('DROP TABLE instructor_speciality');
        $this->addSql('DROP TABLE instructor_statut');
        $this->addSql('DROP TABLE lesson');
        $this->addSql('DROP TABLE lesson_statut');
        $this->addSql('DROP TABLE profil_img');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE quiz');
        $this->addSql('DROP TABLE ressource');
        $this->addSql('DROP TABLE ressource_lesson');
        $this->addSql('DROP TABLE section');
        $this->addSql('DROP TABLE speciality');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE student_training');
        $this->addSql('DROP TABLE training');
        $this->addSql('DROP TABLE training_instructor');
        $this->addSql('DROP TABLE training_img');
        $this->addSql('DROP TABLE `user`');
    }
}
