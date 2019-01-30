<?php

namespace Infusemedia\Model;

class Visitor
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $ipAddress;

    /**
     * @var string
     */
    private $userAgent;

    /**
     * @var \DateTime
     */
    private $viewDate;

    /**
     * @var string
     */
    private $pageUrl;

    /**
     * @var int
     */
    private $viewCount;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getIpAddress(): string
    {
        return $this->ipAddress;
    }

    /**
     * @param string $ipAddress
     *
     * @return $this
     */
    public function setIpAddress(string $ipAddress): self
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getViewDate(): \DateTime
    {
        return $this->viewDate;
    }

    /**
     * @param \DateTime $viewDate
     *
     * @return $this
     */
    public function setViewDate(\DateTime $viewDate): self
    {
        $this->viewDate = $viewDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getPageUrl(): string
    {
        return $this->pageUrl;
    }

    /**
     * @param string $pageUrl
     *
     * @return $this
     */
    public function setPageUrl(string $pageUrl): self
    {
        $this->pageUrl = $pageUrl;

        return $this;
    }

    /**
     * @return int
     */
    public function getViewCount(): int
    {
        return $this->viewCount;
    }

    /**
     * @param int $viewCount
     *
     * @return $this
     */
    public function setViewCount(int $viewCount): self
    {
        $this->viewCount = $viewCount;

        return $this;
    }

    /**
     * @return string
     */
    public function getUserAgent(): string
    {
        return $this->userAgent;
    }

    /**
     * @param string $userAgent
     *
     * @return $this
     */
    public function setUserAgent(string $userAgent): self
    {
        $this->userAgent = $userAgent;

        return $this;
    }
}
