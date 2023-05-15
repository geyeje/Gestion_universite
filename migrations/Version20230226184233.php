<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230226184233 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE etud_note (id INT AUTO_INCREMENT NOT NULL, matiere VARCHAR(60) NOT NULL, liste_etudiants JSON NOT NULL, notes INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE classe_etudiant DROP FOREIGN KEY FK_4BB0EA4D8F5EA509');
        $this->addSql('ALTER TABLE classe_etudiant DROP FOREIGN KEY FK_4BB0EA4DDDEAB1A3');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE classe_etudiant');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, mati??re VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, notes INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE classe_etudiant (classe_id INT NOT NULL, etudiant_id INT NOT NULL, INDEX IDX_4BB0EA4DDDEAB1A3 (etudiant_id), INDEX IDX_4BB0EA4D8F5EA509 (classe_id), PRIMARY KEY(classe_id, etudiant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE classe_etudiant ADD CONSTRAINT FK_4BB0EA4D8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classe_etudiant ADD CONSTRAINT FK_4BB0EA4DDDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE etud_note');
    }
}
