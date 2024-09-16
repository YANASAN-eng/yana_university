package modules;

// 関数型のインターフェイスを作成
@FunctionalInterface
public interface Function {
    double apply(double x);
}

public class Function {
    public Function forward;
    public Function backward;

    public Function(Function forward, Function backward) {
        this.forward = forward;
        this.backward = backward;
    }
}