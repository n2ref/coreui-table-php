<?php
namespace CoreUI\Table\Trait;


/**
 *
 */
trait NoWrap {

    protected ?bool $is_no_wrap        = null;
    protected ?bool $is_no_wrap_toggle = null;


    /**
     * @param bool|null $is_no_wrap
     * @return $this
     */
    public function setNoWrap(bool $is_no_wrap = null): self {
        $this->is_no_wrap = $is_no_wrap;
        return $this;
    }


    /**
     * @return bool|null
     */
    public function getNoWrap():? bool {
        return $this->is_no_wrap;
    }


    /**
     * @param bool|null $is_no_wrap_toggle
     * @return $this
     */
    public function setNoWrapToggle(bool $is_no_wrap_toggle = null): self {
        $this->is_no_wrap_toggle = $is_no_wrap_toggle;
        return $this;
    }


    /**
     * @return bool|null
     */
    public function getNoWrapToggle():? bool {
        return $this->is_no_wrap_toggle;
    }
}