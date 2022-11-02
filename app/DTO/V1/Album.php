<?php

namespace App\DTO\V1;


/**
 * @ExclusionPolicy("none")
 */
class Album
{
    private string $name;
    private mixed $released;
    private mixed $tracks;
    private mixed $cover;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getReleased(): mixed
    {
        return $this->released;
    }

    /**
     * @param mixed $released
     */
    public function setReleased(mixed $released): void
    {
        $this->released = $released;
    }

    /**
     * @return mixed
     */
    public function getTracks(): mixed
    {
        return $this->tracks;
    }

    /**
     * @param mixed $tracks
     */
    public function setTracks(mixed $tracks): void
    {
        $this->tracks = $tracks;
    }

    /**
     * @return mixed
     */
    public function getCover(): mixed
    {
        return $this->cover;
    }

    /**
     * @param mixed $cover
     */
    public function setCover(mixed $cover): void
    {
        $this->cover = $cover;
    }

}
