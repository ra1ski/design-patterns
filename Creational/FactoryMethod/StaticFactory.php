<?php
// only one static method


interface Human
{
    public function getType();

    public function play();

    public function sing();
}

final class StaticFactory
{
    public static function factory(string $type): Human
    {
        switch ($type) {
            case 'black':
                return new BlackMan();
            case 'white':
                return new WhiteMan();
            default:
                throw new InvalidArgumentException('Unknown type');
        }
    }
}

class BlackMan implements Human
{
    protected $type = 'White man';

    public function getType()
    {
        return $this->type;
    }

    public function play()
    {
        return 'basketball';
    }

    public function sing()
    {
        return 'blues';
    }
}

class WhiteMan implements Human
{
    protected $type = 'White man';

    public function getType()
    {
        return $this->type;
    }

    public function play()
    {
        return 'football';
    }

    public function sing()
    {
        return 'folk';
    }
}

$blackMan = StaticFactory::factory('black');
echo sprintf('%s plays %s, loves to sing %s<br>', $blackMan->getType(), $blackMan->play(), $blackMan->sing());

$whiteMan = StaticFactory::factory('white');
echo sprintf('%s plays %s, loves to sing %s<br>', $whiteMan->getType(), $whiteMan->play(), $whiteMan->sing());
