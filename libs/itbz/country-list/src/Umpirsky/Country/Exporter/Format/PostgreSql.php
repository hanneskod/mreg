<?php

/**
 * This file is part of the Country List project.
 *
 *  (c) Саша Стаменковић <umpirsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Umpirsky\Country\Exporter\Format;

use Umpirsky\Country\Exporter\SqlExporter;

/**
 * PostgreSQL exporter.
 *
 * @author Саша Стаменковић <umpirsky@gmail.com>
 */
class PostgreSql extends SqlExporter
{
    /**
     * {@inheritdoc}
     */
    public function getDriver()
    {
        return 'pdo_pgsql';
    }
}
