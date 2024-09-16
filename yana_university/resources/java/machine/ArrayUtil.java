praivate static double delta = 1e-4;
public double numericalDiff(DoubleUnaryOperator func, double x){
    return (func.applyAsDouble(x + h) - func.applyAsDouble(x - h)) / (2 * delta);
}