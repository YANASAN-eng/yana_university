package modules;

public class FunctionPair {
    public Function forward;
    public Function backward;

    public FunctionPair(Function forward, Function backward) {
        this.forward = forward;
        this.backward = backward;
    }
}