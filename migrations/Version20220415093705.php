<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220415093705 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE priorite (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taches (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taches_user (taches_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_3F15B4DEB8A61670 (taches_id), INDEX IDX_3F15B4DEA76ED395 (user_id), PRIMARY KEY(taches_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taches_priorite (taches_id INT NOT NULL, priorite_id INT NOT NULL, INDEX IDX_55D5AB56B8A61670 (taches_id), INDEX IDX_55D5AB5653B4F1DE (priorite_id), PRIMARY KEY(taches_id, priorite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, role INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE taches_user ADD CONSTRAINT FK_3F15B4DEB8A61670 FOREIGN KEY (taches_id) REFERENCES taches (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE taches_user ADD CONSTRAINT FK_3F15B4DEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE taches_priorite ADD CONSTRAINT FK_55D5AB56B8A61670 FOREIGN KEY (taches_id) REFERENCES taches (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE taches_priorite ADD CONSTRAINT FK_55D5AB5653B4F1DE FOREIGN KEY (priorite_id) REFERENCES priorite (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE taches_priorite DROP FOREIGN KEY FK_55D5AB5653B4F1DE');
        $this->addSql('ALTER TABLE taches_user DROP FOREIGN KEY FK_3F15B4DEB8A61670');
        $this->addSql('ALTER TABLE taches_priorite DROP FOREIGN KEY FK_55D5AB56B8A61670');
        $this->addSql('ALTER TABLE taches_user DROP FOREIGN KEY FK_3F15B4DEA76ED395');
        $this->addSql('DROP TABLE priorite');
        $this->addSql('DROP TABLE taches');
        $this->addSql('DROP TABLE taches_user');
        $this->addSql('DROP TABLE taches_priorite');
        $this->addSql('DROP TABLE user');
    }
}
