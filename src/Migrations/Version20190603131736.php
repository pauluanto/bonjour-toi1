<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190603131736 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE recette ADD nom VARCHAR(255) NOT NULL, ADD typeplat VARCHAR(255) NOT NULL, ADD vegetarien VARBINARY(255) NOT NULL, ADD difficulte INT NOT NULL, ADD cout INT NOT NULL, ADD preparation INT NOT NULL, ADD cuisson INT NOT NULL, ADD typecuisson VARCHAR(255) NOT NULL, ADD ingredient VARCHAR(255) NOT NULL, ADD etape VARCHAR(255) NOT NULL, ADD boisson VARCHAR(255) NOT NULL, ADD remarque VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE recette DROP nom, DROP typeplat, DROP vegetarien, DROP difficulte, DROP cout, DROP preparation, DROP cuisson, DROP typecuisson, DROP ingredient, DROP etape, DROP boisson, DROP remarque');
    }
}
