<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230524112859 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mining_laser (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price INTEGER NOT NULL, size INTEGER NOT NULL, optimum_range INTEGER NOT NULL, max_range INTEGER NOT NULL, min_power INTEGER NOT NULL, max_power INTEGER NOT NULL, extraction_power INTEGER NOT NULL, nb_module_slot VARCHAR(255) NOT NULL, resistance INTEGER NOT NULL, instablity INTEGER NOT NULL, optimal_charge_rate INTEGER NOT NULL, optimal_charge_window INTEGER NOT NULL, inert_material INTEGER NOT NULL, buying_locations CLOB NOT NULL --(DC2Type:array)
        )');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE mining_laser');
    }
}
