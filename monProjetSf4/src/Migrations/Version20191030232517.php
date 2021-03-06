<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191030232517 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE actualite (id INT AUTO_INCREMENT NOT NULL, date DATETIME DEFAULT NULL, titre VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, approbation TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question_sondage (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, approval TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reponse_sondage (id INT AUTO_INCREMENT NOT NULL, question_id INT NOT NULL, reponse VARCHAR(255) NOT NULL, nb_vote INT NOT NULL, INDEX IDX_FC7EB7A61E27F6BF (question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reponse_sondage ADD CONSTRAINT FK_FC7EB7A61E27F6BF FOREIGN KEY (question_id) REFERENCES question_sondage (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reponse_sondage DROP FOREIGN KEY FK_FC7EB7A61E27F6BF');
        $this->addSql('DROP TABLE actualite');
        $this->addSql('DROP TABLE question_sondage');
        $this->addSql('DROP TABLE reponse_sondage');
    }
}
