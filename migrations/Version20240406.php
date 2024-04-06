<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240406 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE users 
                    (
                        guid UUID DEFAULT uuid_generate_v4(),
                        email VARCHAR NOT NULL,
                        name VARCHAR NOT NULL,
                        age INT NOT NULL,
                        sex VARCHAR NOT NULL,
                        birthday DATE NOT NULL,
                        phone VARCHAR UNIQUE NOT NULL,
                        created_at TIMESTAMP NOT NULL DEFAULT current_timestamp,
                        updated_at TIMESTAMP NOT NULL DEFAULT current_timestamp,
                        PRIMARY KEY(guid)
                    )');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE users');
    }
}
