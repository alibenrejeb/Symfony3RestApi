<?php

namespace Abr\ServiceCronBundle\Services;

class Chrono
{
    /**
     * timestamp ou microtime(true)
     */
    protected $laps = [];

    /**
     * initialisation du compte tour
     *
     * @param string $label
     * @param float $mtime
     * @return float
     */
    public function start($label = '', $mtime = null)
    {
        $mtime = $this->getMicroTime($mtime);
        $this->laps = [
            [
                'label' => $label,
                'microtime' => $mtime,
            ]
        ];

        return $mtime;
    }

    /**
     * enregistre un lap
     * retourne la durée entre le dernier lap et maintenant
     *
     * @param string $label
     * @param float $mtime
     * @return float
     */
    public function lap($label = '', $mtime = null)
    {
        $mtime = $this->getMicroTime($mtime);

        $last = end($this->laps);

        // ajout d'un tour
        $this->laps[] = [
            'label' => $label,
            'microtime' => $mtime,
        ];

        return $this->clean($mtime - $last['microtime']);
    }

    /**
     * enregistre un lap
     * Retourne la durée entre le premier lap et maintenant
     *
     * @param string $label
     * @param float $mtime
     */
    public function top($label = '', $mtime = null)
    {
        $mtime = $this->getMicroTime($mtime);

        // ajout d'un tour
        $this->laps[] = [
            'label' => $label,
            'microtime' => $mtime,
        ];

        $first = reset($this->laps);
        return $this->clean($mtime - $first['microtime']);
    }

    public static function clean($duration = 0)
    {
        if (!is_numeric($duration))
        {
            throw new \DomainException(get_class(self::class) . " : Duration must be a numeric.");
        }
        else
        {
            $duration = $duration + 0;
            if ($duration < 0)
            {
                $duration *= -1;
            }
        }

        return $duration;
    }

    protected function getMicroTime($mtime = null)
    {
        if (is_null($mtime))
        {
            return microtime(true);
        }
        elseif (is_numeric($mtime))
        {
            return $mtime + 0;
        }

        throw new \DomainException(get_class($this) . " : 'mtime' must be a time() or microtime(true).");
    }

    /**
     * extraction des parties horaire d'une durée : jours heures minutes secondes millisecondes
     *
     * @param float $duration
     * @return array
     */
    public static function explode($duration)
    {
        $duration = self::clean($duration);

        $milliseconds = ($duration - (int) $duration) * 1000;

        $days = (int) ($duration / 60 / 60 / 24);
        $hours = (int) ($duration / 60 / 60) - ($days * 24);
        $minutes = (int) ($duration / 60) - ($days * 60 * 24) - ($hours * 60);
        $seconds = (int) $duration - ($days * 60 * 60 * 24) - ($hours * 60 * 60) - ($minutes * 60);

        return [
            'real' => $duration,
            'days' => $days,
            'hours' => $hours,
            'minutes' => $minutes,
            'seconds' => $seconds,
            'milliseconds' => $milliseconds,
        ];
    }
}